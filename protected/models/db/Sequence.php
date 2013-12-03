<?php

class Sequence extends EMongoDocument
{
    public $collection;
    public $sequence;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getCollectionName()
    {
        return 'sequence';
    }

    public static function getNextSequence($collection){
        $criteria = new EMongoCriteria();
        $criteria->collection = $collection;
        $sequence = self::model()->find($criteria);
        $temp = $sequence->sequence;
        $sequence->sequence++;
        if($sequence->save())
            return $temp;
        else
            throw new CException("Problème lors du sauvegarde de la séquence");
    }

}