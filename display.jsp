<%@ page import="java.sql.*" %>

<html>
<head>
    <title>Student Information</title>
</head>
<body>

<h2>Student Details</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Class</th>
    <th>Division</th>
    <th>City</th>
</tr>

<%
Connection con = null;
Statement stmt = null;
ResultSet rs = null;

try {
    Class.forName("com.mysql.jdbc.Driver");

    con = DriverManager.getConnection(
        "jdbc:mysql://localhost:3306/college_db",
        "root",
        ""   // change this
    );

    stmt = con.createStatement();
    rs = stmt.executeQuery("SELECT * FROM students_info");

    while(rs.next()) {
%>
<tr>
    <td><%= rs.getInt(1) %></td>
    <td><%= rs.getString(2) %></td>
    <td><%= rs.getString(3) %></td>
    <td><%= rs.getString(4) %></td>
    <td><%= rs.getString(5) %></td>
</tr>
<%
    }
} catch(Exception e) {
    out.println("<h3>Error: " + e.getMessage() + "</h3>");
} finally {
    if(rs != null) rs.close();
    if(stmt != null) stmt.close();
    if(con != null) con.close();
}
%>

</table>

</body>
</html>