## README

`docs`目录下存放所有项目相关的文档

## TODO

- [ ] UserInfo表记录用户的X-Deviceid, DeviceType设备类型
- [ ] UserInfo表增加token字段, token_expire_time字段
- [ ] Restaurant表
- [ ] 下一个弄菜单相关的逻辑~
- [ ] 增加一个api_token表,暂时用于api授权
- [ ] 表名改成小写
- [ ] 客户端请求header可以使用RSA进行加密,调研加密的效率问题(暂时优先级较低)
- [ ] 请求头的X-TOKEN字段必须加密!
- [ ] 修改User表,加一个id自增主键bigint列,修改uid为varchar(20) unique,随机生成
- [ ] 考虑有一个默认外键值
- [ ] 创建类的表考虑都加一个Creator_id
- [ ] 完成各个模型之间的外键关系
- [ ] 数据库表名&字段名改为小写?
- [ ] 凡是用到User表的UID字段的全部改为自增的UID字段
- [ ] 设计数据库冗余的时候,要考虑某些字段可能会有修改,所以,可能会经常修改的字段不宜冗余?
- [ ] Apps表增加ID字段
- [ ] AppVersions表的version_code字段改成int类型
- [ ] 增加一个用户登录表,存储用户id, token, refreshToken, expireTime等字段
- [ ] User表: 将UID字段改成UUID字段,主键改为UID; UID为自增整型(zero fill), UUID可以为varchar
- [ ] User表: head_portrait字段改为user_avatar字段
- [ ] 类似Goods表, GoodsCategory表, Restaurant表...都应该有weight权重字段
- [ ] 将Goods表的价格字段改为`double`类型
- [ ] 干掉Order表的total_price字段

## 关于生成UUID

- 可以采取前十位随机+后十位时间戳的某种组合生成+1

## 关于Token表的设计

- id, 自增
- uid, User表的uid主键字段
- deviceId, User表的deviceId字段
- token, varchar(256)
- refresh_token, varchar(256)
- expire_time, token过期时间(未来时间), UNIX时间戳
- created_at
- updated_at
- empty1
- empty2
- empty3
- empty4
- empty5

## 关于动态修改订单

- Laravel端用Event来捕获订单的动态修改请求(订单修改的操作是由顾客端发起的,服务端可以察觉到变化)
- 但是,厨师端和服务员端是无法察觉到变化的,目前的办法是()厨师端&服务员端定期请求客户端的数据了?)

## 关于本系统

- 本系统分为[单店版]和[平台版]
- 如果是给[单店版]使用,则打包的Android应用会有restaurant_id信息(在`AndroidManifest.xml`中)
