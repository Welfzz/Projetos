<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<html>
<head>
    <title>Aplicação - Loja de Livros</title>
</head>
<body>

	<div align="center">
		<h1>Gerenciamento de livros</h1>
        <h2>
            <a href="new">Adicionar novo</a>
            &nbsp;&nbsp;&nbsp;
            <a href="list">Listar todos os livrps</a>   
        </h2>
	</div>

    <div align="center">
        <table border="1" cellpadding="5">
           <caption><h3>Lista de livros</h3></caption>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
            <c:forEach var="book" items="${listBook}">
                <tr>
                    <td><c:out value="${book.id}" /></td>
                    <td><c:out value="${book.title}" /></td>
                    <td><c:out value="${book.author}" /></td>
                    <td><c:out value="${book.price}" /></td>
                    <td>
                        <a href="edit?id=<c:out value='${book.id}' />">Editar</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="delete?id=<c:out value='${book.id}' />">Remover</a>                     
                    </td>
                </tr>
            </c:forEach>
        </table>
    </div>
    
    <div align="center">
    	<h1>-----------</h1>
    </div>
    
    <div align="center">
    	<h2><a href=Creditos.jsp>Creditos</a></h2>
    </div>
       
</body>
</html>
