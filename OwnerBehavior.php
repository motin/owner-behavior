<?php
/**
// Owner Behavior by thyseus <thyseus@gmail.com>

// Assuming a dataset is "owned" by a user, we need to set the id
// of the current logged in user when saving the dataset automatically.
 * Class OwnerBehavior
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
                $this->owner->{$this->ownerColumn} = Yii::app()->user->id;
            }
        }

        return true;
    }

}
