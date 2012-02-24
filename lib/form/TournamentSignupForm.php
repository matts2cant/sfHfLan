<?php

class TournamentSignupForm extends BaseForm
{

  public function configure()
  {
    $tournament = $this->getOption('tournament');
    $count = $tournament->getGame()->getPlayersPerTeam();

    $count = max(1, $count);

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

    for ($i = 0; $i < $count; $i++) {
      $player = new Player();
      $player->setTournament($tournament);
      $this->embedForm('player_' . ($i + 1), new PlayerTournamentForm($player, array('tournament' => $tournament)));
      $this->widgetSchema->setLabel('player_' . ($i + 1), 'Joueur ' . ($i + 1));
    }
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