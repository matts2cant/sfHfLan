<?php

class TournamentSignupForm extends BaseForm
{
  protected $playerCount;

  public function configure()
  {
    $tournament = $this->getOption('tournament');
    $this->playerCount = $tournament->getGame()->getPlayersPerTeam();

    $this->playerCount = max(1, $this->playerCount);

    if($tournament->getGame()->getPlayersPerTeam() > 1)
    {
      $this->setWidget('team', new sfWidgetFormInputText());
      $this->setValidator('team', new sfValidatorPass());
      $this->setWidget('team_tag', new sfWidgetFormInputText());
      $this->setValidator('team_tag', new sfValidatorPass());
      $this->widgetSchema->setLabels(array(
        'team'    => 'Team',
        'team_tag'   => 'Tag de team',
      ));
    }

    for ($i = 0; $i < $this->playerCount; $i++) {
      $player = new Player();
      $player->setTournament($tournament);
      $this->embedForm('player_' . ($i + 1), new PlayerTournamentForm($player, array('tournament' => $tournament)));
      $this->widgetSchema->setLabel('player_' . ($i + 1), 'Joueur ' . ($i + 1) . '<br/><span class="small">Player '. ($i + 1) .'</span>');
    }

    $this->validatorSchema->setPostValidator(new sfValidatorCallback(array('callback' => array($this, 'checkDifferentEmails'))));
  }

  public function checkDifferentEmails($validator, $values)
  {
    $emails = array();
    for ($i = 0; $i < $this->playerCount; $i++)
    {
      $emails[$values['player_' . ($i + 1)]['email']] = $i;
    }

    if(count($emails) != $this->playerCount)
    {
      throw new sfValidatorErrorSchema($validator, array(new sfValidatorError($validator, "Veuillez entrer des emails différents")));
    }

    return $values;
  }

  public function getPlayers()
  {
    if($this->isValid())
    {
      $players = array();
      foreach($this->getEmbeddedForms() as $form)
      {
        $players[] = $form->getObject();
      }
      return $players;
    }
    else
    {
      return false;
    }
  }

  public function save()
  {
    $i = 1;

    foreach($this->getEmbeddedForms() as $form)
    {
      $name = 'player_' . $i;
      $values = $this->getValues();
      $form->updateObject($values[$name]);
      if(isset($this['team']) AND isset($this['team_tag']))
      {
        $form->getObject()->setTeam($this->values['team']);
        $form->getObject()->setTeamTag($this->values['team_tag']);
      }
      $form->getObject()->setTournament($this->getOption('tournament'));
      $form->getObject()->save();
      $i++;
    }
  }
}