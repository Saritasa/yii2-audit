# Replacing User ID

By default the views output the raw user_id stored in the audit tables.  You can customise this with your own callback.

For example add the following to your User model:

```php
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
    /**
     * @param string $id user_id from audit_entry table
     * @return mixed|string
     */
    public static function userIdentifierCallback($id)
    {
        $user = self::findOne($id);
        return $user ? Html::a($user->username, ['/user/admin/update', 'id' => $user->id]) : $id;
    }
}
```

Then update the audit module in your config array:

```php
$config = [
    'modules' => [
        'audit' => [
            'class' => 'bedezign\yii2\audit\Audit',
            'userIdentifierCallback' => ['app\models\User', 'userIdentifierCallback'],
        ],
    ],
];
```

## Filtering on identifier

The other way around is also supported. If you provide a second callback that accepts a string and returns a user id/an array of user ids, you can search for your identifiers and whatnot.

For example:

```php
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
    /**
     * @param string $identifier user_id from audit_entry table
     * @return mixed|string
     */
    public static function filterByUserIdentifierCallback($identifier)
    {
    	return static::find()->select('id')
    		->where(['like', 'username', $identifier])
    		->orWhere(['like', 'email', $identifier])
    		->column();
    }
}
```

And your module configuration:

```php
$config = [
    'modules' => [
        'audit' => [
            'class' => 'bedezign\yii2\audit\Audit',
            'userFilterCallback' => ['app\models\User', 'filterByUserIdentifierCallback'],
        ],
    ],
];
```
