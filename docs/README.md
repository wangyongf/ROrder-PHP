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

## 关于生成UID

- 可以采取前十位随机+后十位时间戳的某种组合生成+1
