<?php

/**
 * EventTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EventTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object EventTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Event');
    }
    
    public function findUpComingEvent()
    {
        $now = date('Y-m-d H:i:s', time());
        $query = $this->createQuery('ev')->
                where("ev.starts_at > ?", $now)->
                andWhere("ev.is_public = ?", true)->
                orderBy('starts_at ASC')->
                limit(1);
        
        return $query->fetchOne();
    }
}