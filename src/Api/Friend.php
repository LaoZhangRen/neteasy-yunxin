<?php
/**
 * User: salamander
 * Date: 18-12-12
 * Time: 上午11:48
 */

namespace LaoZhangRen\YunXin\Api;

use LaoZhangRen\YunXin\Exception\YunXinArgExcetption;

class Friend extends Base
{
    // const CHAT_SEND_LIMIT = 500;

    /**
     * 添加好友
     * @param $accid 发起者accid
     * @param $faccid 要添加朋友的accid
     * @param $type 是否需要删除备注信息 1直接加好友，2请求加好友，3同意加好友，4拒绝加好友
     */
    public function addFriends($accid, $faccid, int $type) {
        if (!$accid || !is_string($accid)) {
            throw new YunXinArgExcetption('发送者id不能为空！');
        }
        if (strlen($accid) > self::ACCID_LEGAL_LENGTH) {
            throw new YunXinArgExcetption('发送者id超过限制！');
        }
        if (!$faccid || !is_string($faccid)) {
            throw new YunXinArgExcetption('被添加者id不能为空！');
        }
        if (strlen($faccid) > self::ACCID_LEGAL_LENGTH) {
            throw new YunXinArgExcetption('被添加者id超过限制！');
        }
        if (!in_array($type, [1, 2, 3, 4])) {
            throw new YunXinArgExcetption('type参数不合法');
        }

        $res = $this->sendRequest('friend/add.action', [
            'accid'  => $accid,
            'faccid' => $faccid,
            'type'   => $type
        ]);

        return $res;
    }

    /**
     * 删除好友
     * @param $accid 发起者accid
     * @param $faccid 要删除朋友的accid
     * @param $isDeleteAlias 是否需要删除备注信息 默认false:不需要，true:需要
     */
    public function delFriends($accid, $faccid, bool $isDeleteAlias = true) {
        if (!$accid || !is_string($accid)) {
            throw new YunXinArgExcetption('发送者id不能为空！');
        }
        if (strlen($accid) > self::ACCID_LEGAL_LENGTH) {
            throw new YunXinArgExcetption('发送者id超过限制！');
        }
        if (!$faccid || !is_string($faccid)) {
            throw new YunXinArgExcetption('被删除者id不能为空！');
        }
        if (strlen($faccid) > self::ACCID_LEGAL_LENGTH) {
            throw new YunXinArgExcetption('被删除者id超过限制！');
        }
        if (!is_bool($isDeleteAlias)) {
            throw new YunXinArgExcetption('参数isDeleteAlias为bool类型！');
        }

        $res = $this->sendRequest('friend/add.action', [
            'accid'         => $accid,
            'faccid'        => $faccid,
            'isDeleteAlias' => $isDeleteAlias
        ]);

        return $res;
    }
}
