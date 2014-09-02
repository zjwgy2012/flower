<xml>
    <ToUserName><![CDATA[{{ $message->FromUserName }}]]></ToUserName>
    <FromUserName><![CDATA[{{ $message->ToUserName }}]]></FromUserName>
    <CreateTime>{{ time() }}</CreateTime>
    <MsgType><![CDATA[{{$message->MsgType}}]]></MsgType>
    @if ($message->MsgType == 'text')
    <Content><![CDATA[{{ $message->Content}}]]></Content>
    @elseif ($message->MsgType == 'voice')
    <Voice>
    <MediaId><![CDATA[{{ $message->MediaId }}]]></MediaId>
    </Voice>
    @endif
</xml>
