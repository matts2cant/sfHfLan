<?php

class BookingForm extends BaseForm
{
  public function configure()
  {
    $table = TournamentTable::getInstance()->findAll();

    $tournaments = array();

    foreach($table as $tournament)
    {
      $tournaments[$tournament->getId()] = $tournament->getEvent()->getName().' &raquo; '.$tournament->getName();
      if($tournament->isFull())
      {
        $tournaments[$tournament->getId()] .= " (complet)";
      }
    }

    // Tournament chooser field
    $this->setWidget('tournament', new sfWidgetFormChoice(array(
      'choices' => $tournaments,
      'expanded' => false
    )));
    $this->setValidator('tournament', new sfValidatorChoice(array(
      'choices' => array_keys($tournaments)
    )));
    $this->widgetSchema->setLabel('tournament', 'Choisissez un tournoi :');

    // Input chooser field
    $this->setWidget('input', new sfWidgetFormTextarea());
    $this->setValidator('input', new sfValidatorBooking());
    $this->widgetSchema->setLabel('input', 'Liste');
    $this->widgetSchema->setHelp('input', 'Entrer une liste de joueurs au format suivant :<br/>
                                           [pseudo]:[email]');
  }
}