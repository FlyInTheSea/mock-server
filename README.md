##  准则



###  采取域名驱动的模式 

####   规则为　sprintf('%s.mock.com/%s',$domain,$origin_path);
####   示例 
```
    原请求路由
        https://api.tongdun.cn/trinity_force/v1/get_data
    mock的请求路由
        tongdun.mock.com/trinity_force/v1/get_data
```

    可能的请求冲突  
    
    比如获取钉钉的用户是  /route?action=users
    
    访问百度地图定位的也是 /route?action=map
    
    则对于 mock 路径 的配置比较复杂
    
    另外　如果采用统一的路由　则　区分项目也比较困难
    
    理想的情况是　
    
    示例　mock 

    如果是百融征信的自然人查询接口　mock
    
    则给到的地址为
    
    100credit.mock.com/trinity_force/v1/get_data
    
    如果是同盾征信的查询接口　mock
    
    tongdun.mock.com/trinity_force/v1/get_data
    
    
    
