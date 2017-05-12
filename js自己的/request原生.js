var urlObj=require("url");
var http=require("http");
var fs=require("fs");
var path=require("path");
var opt={
    protocol:"http:",
    hostname:"www.shenhuagroup.com.cn",
    path:"/shjtww/1382682123602/dl.shtml"
}
var obj=http.request(opt,function (res) {
    var data="";
    res.on("data",function (e) {
        // buffer
        data+=e;
        // console.log(e)
    })
    res.on("end",function () {
        // 将所有src获取出来
        var arr=(data.match(/src="\/([^"]*)/g));
        // console.log(arr)
        // 循环
        arr.forEach(function (obj) {
            // 截取掉前面没用的
            var url=obj.slice(5);
            // console.log(url)
            var obj=urlObj.parse(url);
            // 定义爬下来的文件名
            var name=path.basename(obj.path);
            // 判断后缀名是js的跳过
            if(path.extname(obj.path)!=".js") {
                //定义 一个opt 是一个图片的url的路径拼接
                var opt1 = {
                    protocol: opt.protocol,
                    hostname: opt.hostname,
                    path: url
                };
                // 爬
                var newObj = http.request(opt1, function (e) {
                    // 管道
                    e.pipe(fs.createWriteStream(path.join(__dirname, "/imgs/", name)));
                })
                newObj.end();
            }
        })
    })
})
obj.end();