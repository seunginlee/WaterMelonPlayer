<%
Class.forName("com.mysql.jdbc.Driver"); 
String searchKey = request.getParameter("searchKey");
Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/test_1","root","123123"); 
Statement stmt = conn.createStatement();
String search = "select * from db_list2 where num ='"+searchKey+"';"; 
ResultSet rs = stmt.executeQuery(search);

%>

<%
if(rs.next()){ 
%>
<h3>결과 내용:</h3><br>
<table border = "1">
<tr align="center">
<td width="200">학번</td>
<td width="200">이름</td>
</tr>

<tr align="center">
<td><%=rs.getString(1)%></td> <!-- 학번 -->
<td><%=rs.getString(2)%></td> <!-- 이름 -->
</tr>
</table>
<%}else%><h1>검색결과 없음</h1>
<%
stmt.close();
conn.close();
%>