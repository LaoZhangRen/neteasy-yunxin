<?php
namespace LaoZhangRen\YunXin;


use LaoZhangRen\YunXin\Api\Chat;
use LaoZhangRen\YunXin\Api\ChatRoom;
use LaoZhangRen\YunXin\Api\User;
use LaoZhangRen\YunXin\Api\Friend;

/**
 * 入口类
 * Class Entrance
 * @package YunXinHelper
 */
class Entrance {

    /**
     * 网易云信分配的账号
     * @var string $appKey
     */
    private $appKey;

    /**
     * 网易云信分配的密钥
     * @var string $appSecrt
     */
    private $appSecrt;

    private $instances = [];

    public function __construct($appKey, $appSecrt)
    {
        $this->appKey = $appKey;
        $this->appSecrt = $appSecrt;
    }

    /**
     * @return User
     */
    public function user() {
        $key = 'user';
        if (!array_key_exists($key, $this->instances)) {
            $user = new User($this->appKey, $this->appSecrt);
            $this->instances[$key] = $user;
        }
        return $this->instances[$key];
    }


    /**
     * @return Chat
     */
    public function chat() {
        $key = 'chat';
        if (!array_key_exists($key, $this->instances)) {
            $chat = new Chat($this->appKey, $this->appSecrt);
            $this->instances[$key] = $chat;
        }
        return $this->instances[$key];
    }


    /**
     * @return ChatRoom
     */
    public function chatRoom() {
        $key = 'ChatRoom';
        if (!array_key_exists($key, $this->instances)) {
            $chatRoom = new ChatRoom($this->appKey, $this->appSecrt);
            $this->instances[$key] = $chatRoom;
        }
        return $this->instances[$key];
    }

    /**
     * @return Friend
     */
    public function friend() {
        $key = 'Friend';
        if (!array_key_exists($key, $this->instances)) {
            $friend = new Friend($this->appKey, $this->appSecrt);
            $this->instances[$key] = $friend;
        }
        return $this->instances[$key];
    }


    /**
     * 抄送消息验证检验码
     * @param $body
     * @param $curTime
     * @param $checksumPost
     * @return bool
     */
    public function isLegalChecksum($body, $curTime, $checksumPost) {
        return sha1($this->appSecrt . md5($body) . $curTime) === $checksumPost;
    }
}
