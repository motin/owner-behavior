Yii Extension: OwnerBehavior
==========================

Behavior to automate setting the "owned by user" attribute to the currently logged in user id upon creation of a record.

Setup
-----

### Download and install

Ensure that you have the following in your composer.json:

    "repositories":[
        {
            "type": "vcs",
            "url": "https://github.com/motin/yii-owner-behavior"
        },
        ...
    ],
    "require":{
        "motin/owner-behavior":"@dev",
        ...
    },

Then install through composer:

    php composer.php update motin/yii-owner-behavior

If you don't use composer, clone or download this project into /path/to/your/app/vendor/motin/owner-behavior

### Import the behavior in main.php

    'import' => array(
        ...
        'vendor.motin.yii-owner-behavior.OwnerBehavior',
        ...
    ),


### Configure models to be part of the qa process

    public function behaviors()
    {
        return array(
            'owner-behavior' => array(
                 'class' => 'OwnerBehavior',
            ),
        );
    }

Changelog
---------

### 0.1.0

- Only setting the attribute if it is null, so that one can specify the field manually before hitting insert()/save()

### 0.0.0

- Forked/revived thyseus <thyseus@gmail.com> OwnerBehavior from https://github.com/schmunk42/p3extensions/commit/aa990c986fabd4ab5932ee504b593b230238ccac
