<?php
/**
 * Behavior to automate setting the “owned by user" attribute to
 * the currently logged in user id.
 *
 * Based on OwnerBehavior by thyseus
 * <thyseus@gmail.com>, however
 * this behavior will only set the attribute if it is null, so that
 * one can specify the field manually before hitting insert()/save()
 *
 * @license MIT
 * @author thyseus
 * <thyseus@gmail.com>
 * @author Fredrik Wollsén
 * <fredrik@neam.se>
 */
class OwnerBehavior extends CActiveRecordBehavior
{

    /**
     * The field that stores the pk of the owner
     */
    public $ownerColumn = 'owner_id';

    public function beforeValidate($on)
    {
        if (isset($this->owner->tableSchema->columns[$this->ownerColumn])) {
            if ($this->owner->isNewRecord) {
                if (is_null($this->owner->{$this->ownerColumn})) {
                    $this->owner->{$this->ownerColumn} = Yii::app()->user->id;
                }
            }
        }

        return true;
    }

}
