<?php
/**
 *
 * wechat php test
 */

//define your token
//weixinabc是一个token,是一个令牌
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();

$wechatObj->responseMsg();
//$wechatObj->valid();
//exit;

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];


        if ($this->checkSignature()) {
            echo $echoStr;
            exit;
        }
    }


    public function responseMsg()
    {

        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];


        if (!empty($postStr)) {

            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);

            $event = $postObj->Event;
            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";


            switch ($postObj->MsgType) {
                case 'event':

                    if ($event == 'subscribe') {
                        //关注后的回复
                        $contentStr = "您好，感谢您关注“艾克影院”\n\n回复影视名字就可以观看影视啦！\n\n如果您还不懂的如何什么使用？\n\n请点击【使用教程】：\n\n<a href=\"https://mp.weixin.qq.com/s/8JpNMu35diqLDsDJgJMf1g\">使用教程</a>丨<a href=\"http://vip.zyfx8.cn\">艾克官网</a>丨<a href=\"https://mp.weixin.qq.com/s/atoQpkMSQurZhmipSqvaYw\">商业合作</a>";
                        $msgType = 'text';
                        $textTpl = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $textTpl;

                    }
                    break;
                case 'text':
                    {
                        /*$newsTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>1</ArticleCount>
                        <Articles>
                        <item>
                        <Title><![CDATA[%s]]></Title>
                        <Description><![CDATA[%s]]></Description>
                        <PicUrl><![CDATA[%s]]></PicUrl>
                        <Url><![CDATA[%s]]></Url>
                        </item>
                        </Articles>
                        </xml>"; */
                        $tmp_arr = array(
                            'text' => <<<XML
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
<FuncFlag>0</FuncFlag>
</xml>
XML
                        ,
                            'singlenews' => <<<XML
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>1</ArticleCount>
<Articles>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
</Articles>
</xml>
XML
                        ,
                            'newses' => <<<XML
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>4</ArticleCount>
<Articles>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
</Articles>
</xml>
XML
                        );
                        if ($keyword <> "") {
                            switch (trim($postObj->Content)) {

                                case '电影':
                                    $contentStr = " \r\n 输入影视名字如：\n\n  画江湖之不良人 即可在线观看！\r\n ";
                                    break;
                                case '一本道':
                                    $contentStr = " \r\n 一本道没找到，\n\n 倒是给你找到了一个比一本道更好的资源! \n\n <a href='http://vip.zyfx8.cn/fuli.php'>快戳我 快戳我</a> \r\n ";
                                    break;
                                case '小说':
                                    $contentStr = " \r\n 艾克在线小说网：\n\n <a href='http://book.aikeyy.top/'>Book.AiKeYY.Top</a> \n\n 如果没有您想看的小说请留言反馈! \r\n ";
                                    break;
                                case '最右':
                                    $contentStr = " \r\n 最右自动私聊脚本App：\n\n <a href='https://pan.baidu.com/s/1usDz_-RIbA4TjymE7f3Jtg'>https://pan.baidu.com/s/1usDz_-RIbA4TjymE7f3Jtg</a> \n\n 密码: kv9p \r\n ";
                                    break;
                                case '电视台':
                                case 'cctv1':
                                case 'cctv2':
                                case 'cctv3':
                                case 'cctv4':
                                case '湖南卫视':
                                    $contentStr = " \r\n 艾克影院电视台直播：\n\n <a href='http://vip.zyfx8.cn/zhibo.php'>电视台直播频道</a> \r\n ";
                                    break;
                                case '世界杯':
                                    $contentStr = " \r\n 艾克影院电视台直播：\n\n <a href='http://vip.zyfx8.cn/mplay.php?id=1&url=aHR0cDovL2hscy5tdi53YTUuY29tL2xpdmUvZ3NzcG9ydHMxL3BsYXlsaXN0Lm0zdTg=&name=2018%E4%BF%84%E7%BD%97%E6%96%AF%E4%B8%96%E7%95%8C%E6%9D%AF%E7%9B%B4%E6%92%AD'>2018俄罗斯世界杯</a> \n\n <a href='http://vip.zyfx8.cn/zhibo.php'>更多电视台直播频道</a> \r\n ";
                                    break;
                                case 'cctv5':
                                case 'CCTV5':
                                    $contentStr = " \r\n 艾克影院电视台直播：\n\n <a href='http://vip.zyfx8.cn/zhibo.php?channel=cctv5'>CCTV5</a> \n\n <a href='http://vip.zyfx8.cn/zhibo.php'>更多电视台直播频道</a> \r\n ";
                                    break;
                                case '良玉':
                                    $contentStr = '我喜欢你';
                                    break;
                                case '返校':
                                    $contentStr = " \r\n 艾克影院提示：\n\n《返校》该游戏涉及政治问题！\n\n请添加微信：2500021963 \n\n获取下载链接，添加时请备注返校！ \r\n ";
                                    break;
                                case '推单':
                                case '竞彩':
                                case '外围':
                                case '足球':
                                case '世界杯':
                                    $contentStr = '请添加微信号：2500021963';
                                    break;
                                case '求片':
                                case '留言':
                                case '反馈':
                                case '建议':
                                    $contentStr = "  \r\n 留言求片/意见反馈：\n\n  <a href='http://vip.zyfx8.cn/lyb.php'>我要留言求片/意见反馈</a> \r\n ";
                                    break;
                                case '吃鸡':
                                case '加速器':
                                case '黑号':
                                case '科技':
                                    $contentStr = " \r\n 吃鸡免费加速器：\n\n  <a href='https://jq.qq.com/?_wv=1027&k=5Eqy6gd'>QQ群：271535412</a> \n\n  <a href='http://wg.heylover.top/'>吃鸡科技(复制链接到浏览器)</a> \n\n 链接:http://wg.heylover.top/ \r\n ";
                                    break;
                                case '看不了':
                                case '不能看':
                                case '怎么用':
                                case '电影':
                                case '资源':
                                case '不会用':
                                case '弄不来':
                                case '怎么办':
                                    $contentStr = " \r\n 艾克影院使用教程：\n\n  <a href='https://mp.weixin.qq.com/s/8JpNMu35diqLDsDJgJMf1g'>图文教程(点我，进入使用说明!)</a> \n\n  <a href='http://vip.zyfx8.cn/mp4/spjc.mp4'>视频教程(点我，进入使用说明!)</a> \r\n ";
                                    break;
                                case '书旅and良玉':
                                    $contentStr = 'Forever with you';
                                    break;

                                case 'yhq':
                                case '优惠券':
                                    $contentStr = " \r\n  淘宝天猫内部优惠券网站： \n\n  <a href='http://yhq.aikeyy.top/'>yhq.aikeyy.top (点我进入)</a>  \n\n  淘宝天猫优惠券使用教程： \n\n <a href='https://mp.weixin.qq.com/s/dimrzfodshygurz4eRN3GQ'>图文教程(点我，进入图文教程!)</a> \r\n ";
                                    break;

                                case '三级片':
                                case '福利':
                                case '黄色':
                                case 'av':
                                case 'AV':
                                case '波多野':
                                case 'A片':
                                case '黄色网站':
                                case '写真':
                                case '小视频':
                                case '三级':
                                    $title = '您要看的《' . $keyword . '》,给您找到以下结果：';
                                    //标题
                                    $des1 = '《' . $keyword . '》 - 点击观看，更多最新影视尽在首页！';
                                    //图片地址
                                    $picUrl1 = "http://vip.zyfx8.cn/images/weixintu3.png";
                                    //跳转链接
                                    $url = 'http://vip.zyfx8.cn/seacher.php?sousuo=siya';
                                    $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url);
                                    echo $resultStr;
                                    break;

                                default:

                                    $news_arr = array(
                                        'news1' => array('title' => '搜索《' . $keyword . '》,给您找到以下结果：', 'decription' => '给您找到以下结果', 'PicUrl' => 'http://vip.zyfx8.cn/images/weixintu3.png', 'Url' => 'http://home.aikeyy.top'),
                                        'news2' => array('title' => '点我看影视《' . $keyword . '》', 'decription' => '点击看影视', 'PicUrl' => 'http://vip.zyfx8.cn/images/tx1.png', 'Url' => 'http://vip.zyfx8.cn/seacher.php?sousuo=' . $keyword),
                                        'news3' => array('title' => '点我看小说《' . $keyword . '》', 'decription' => '点击看小说', 'PicUrl' => 'http://vip.zyfx8.cn/images/tx2.png', 'Url' => 'http://book.aikeyy.top/search.html?searchtype=novelname&searchkey=' . $keyword),
                                        'news4' => array('title' => '领取优惠券《' . $keyword . '》', 'decription' => '领取优惠券', 'PicUrl' => 'http://vip.zyfx8.cn/images/tx3.png', 'Url' => 'http://yhq.aikeyy.top/index.php?r=index%2Fsearch&s_type=1&kw=' . $keyword));

                                    $resultStr = sprintf($tmp_arr['newses'], $fromUsername, $toUsername, $time, $news_arr['news1']['title'], $news_arr['news1']['decription'], $news_arr['news1']['PicUrl'], $news_arr['news1']['Url'], $news_arr

                                    ['news2']['title'], $news_arr['news2']['decription'], $news_arr['news2']['PicUrl'], $news_arr['news2']['Url'], $news_arr['news3']['title'], $news_arr['news3']['decription'], $news_arr['news3']['PicUrl'],

                                        $news_arr['news3']['Url'], $news_arr['news4']['title'], $news_arr['news4']['decription'], $news_arr['news4']['PicUrl'], $news_arr['news4']['Url']);
                                    echo $resultStr;


                                /*	 	$title = '您要看的《'.$keyword.'》,给您找到以下结果：';
                                        //标题
                                        $des1 ='点击观看《'.$keyword.'》,回复优惠券可领淘宝优惠券!!!';
                                        //图片地址
                                        $picUrl1 ="http://vip.zyfx8.cn/images/weixintu3.png";
                                        //跳转链接
                                        $url="http://vip.zyfx8.cn/seacher.php?sousuo=".$keyword;

                                        $resultStr= sprintf($newsTpl, $fromUsername, $toUsername, $time, $title, $des1, $picUrl1, $url);

                                        echo $resultStr;    */
                            }
                        }
                        //$contentStr = " \r\n 输入影视名字如： \n\n  画江湖之不良人 即可在线观看！\r\n ";

                        $msgType = 'text';
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                    }


                    break;
                default:
                    break;

            }

        } else {
            echo "你好！欢迎进入【艾克影院】微信公众号";
            exit;
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}

?>
