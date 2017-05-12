var request=require("request");
var fs=require("fs");
var path=require("path");
var cheerio=require("cheerio");
// fs.mkdir("img/");
request("http://www.zhihu.com/publications/weekly/119553629",function (err,head,body) {
    // console.log(body);
    var $=cheerio.load(body);
    $("img").each(function (index,obj) {
        // console.log(obj);
        // 改变地址
        var str=$(obj).attr("src");
        if(str.indexOf("https")<0){
            str="http://www.zhihu.com"+str;
            // console.log(str)
        }
        // console.log(str);
        //名字
        // 未解决  本地图片无法爬取
        var name=str.substr(str.lastIndexOf("/")+1);
        request.get(str,function (err) {
            if(err){
                console.log("爬取错误！");
            }
        }).pipe(fs.createWriteStream(path.join(__dirname,"./img/")+name));
    })
})