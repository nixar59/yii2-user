<?php


namespace nixar59\user\models;


use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 * @package nixar59\user\models
 *
 * @property int $id
 * @property string $phone
 * @property string $phone_confirm_code
 * @property boolean $phone_confirmed
 * @property string $email
 * @property string $email_confirm_code
 * @property boolean $email_confirmed
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 *
 */
class User extends ActiveRecord implements IdentityInterface
{

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return User the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled. The returned key will be stored on the
     * client side as a cookie and will be used to authenticate user even if PHP session has been expired.
     *
     * Make sure to invalidate earlier issued authKeys when you implement force user logout, password change and
     * other scenarios, that require forceful access revocation for old sessions.
     *
     * @return string a key that is used to check the validity of a given identity ID.
     * @throws \yii\base\Exception
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @throws \yii\base\Exception
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $authKey == $this->auth_key;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findByLogin($login)
    {
        return static::find()->where(['email' => $login])->orWhere(['phone' => $login])->one();
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
}