## 根据OrderDetailId获取相应订单详情的接口

#### 1. URL

/api/v1/order_detail/get/{id}

> `id`为订单详情编号

#### 2. 请求方式

GET

#### 3. 请求方式

- X-Deviceid, 必须有
- timestamp, 时间戳
- nonce, 随机数
- signature, 加密签名, signature=SHA1(timestamp+nonce+token)

> 后端需对timestamp进行校验

#### 4. 请求body

无

#### 5. 返回值示例

成功:
```json
{
    "code": 0,
    "msg": "接口调用成功",
    "data": {
        "goods_raw_id": 1234567890,
        "goods_id": "1",
        "name": "卤蛋",
        "original_price": 17.2,
        "real_price": 15.1,
        "cover": "http://www.baidu.com",
        "pictures": "此处是一段json字符串",
        "status": 0,                          //进度(枚举): 0-尚未开始制作,1-正在制作,2-制作完成上菜中,3-上菜完毕
        "quantity": 2,
        "order_raw_id": 1,
        "order_id": "1234",
        "created_at": "2017-05-08 17:08:27",
        "updated_at": "2017-05-08 17:08:27"
    }
}
```

失败:
```json
{
    "code": 500,
    "msg": "接口调用失败",
    "data": null
}
```

#### 6. 错误码code说明

- code: 0, 操作成功
- code: 500, 服务器内部错误,请稍后再试

#### 7. 注意事项

无