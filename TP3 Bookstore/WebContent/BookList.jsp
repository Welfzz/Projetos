<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<html>
<head>
    <title>Books Store Application</title>
</head>
<body>

	<div align="center">
		<h1>Books Management</h1>
        <h2>
            <a href="new">Add New Book</a>
            &nbsp;&nbsp;&nbsp;
            <a href="list">List All Books</a>   
        </h2>
	</div>

    <div align="center">
        <table border="1" cellpadding="5">
           <caption><h3>List of Books</h3></caption>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            <c:forEach var="book" items="${listBook}">
                <tr>
                    <td><c:out value="${book.id}" /></td>
                    <td><c:out value="${book.title}" /></td>
                    <td><c:out value="${book.author}" /></td>
                    <td><c:out value="${book.price}" /></td>
                    <td>
                        <a href="edit?id=<c:out value='${book.id}' />">Edit</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="delete?id=<c:out value='${book.id}' />">Delete</a>                     
                    </td>
                </tr>
            </c:forEach>
        </table>
    </div>
    
    <div align="center">
    	<h1>-----------</h1>
    </div>
    
    <div align="center">
    	<h2><a href=Credits.jsp>Credits</a></h2>
    </div>
       
</body>
</html>