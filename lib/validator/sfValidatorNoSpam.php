<?php

class sfValidatorNoSpam extends sfValidatorBase
{
    protected function configure($options = array(), $messages = array())
    {
        parent::configure($options, $messages);
    }

    protected function doClean($value)
    {
        if(preg_match('#< *a *href *= *"?.+"? *>.+< */ *a *>#i', $value))
            throw new sfValidatorError($this, 'Link found');

        if(preg_match('#https?://|\w\.(com|net|fr)(\W|$)#', $value))
            throw new sfValidatorError($this, 'Url found');

        $spams = SpamTable::getInstance()->findAll()->toArray();

        foreach($spams as $spam)
        {
            $domain = preg_replace('#\.[a-z]{2,3}$#', '', $spam['url']);
            $domain = preg_replace('#^https?://(w{3}\.)?#', '', $domain);
            if(strpos($value, $domain) !== false)
                throw new sfValidatorError($this, 'Spam detected');
        }

        return $value;
    }
}