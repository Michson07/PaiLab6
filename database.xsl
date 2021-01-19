<?xml version="1.0" encoding="UTF-8" ?>
	<xsl:stylesheet version="1.0"
		xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

	<xsl:output method="xml" indent="yes"
		doctype-public="-//W3C//DTD XHTML 1.1//EN"
		doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"/>
    
	<xsl:template match="/">
		<html>
			<head>
				<title>PAI LAB6 Czajkowski Michał i Marcin Chodorek</title>
				<link rel="stylesheet" type="text/css" href="style.css" />
			</head>
			<body>
				<xsl:apply-templates/>
				<h4><a href="index.html">Powrót</a></h4>
			</body>
		</html>
	</xsl:template>
	<xsl:template match="readers">
		<h4>Lista readerów:</h4>
		<table>
			<tr>
				<td><b>ID</b></td>
				<td><b>name</b></td>
				<td><b>lastname</b></td>
				<td><b>address</b></td>
			</tr>
			<xsl:for-each select="reader">
				<tr>
					<td><xsl:value-of select="@id"/></td>
					<td><xsl:value-of select="name"/></td>
					<td><xsl:value-of select="lastname"/></td>
					<td><xsl:value-of select="address"/></td>
				</tr>
			</xsl:for-each>
		</table>
	</xsl:template>
    <xsl:template match="books">
		<h4>Lista książek:</h4>
		<table>
			<tr>
				<td><b>ID</b></td>
				<td><b>title</b></td>
				<td><b>author</b></td>
			</tr>
			<xsl:for-each select="book">
				<tr>
					<td><xsl:value-of select="@id"/></td>
					<td><xsl:value-of select="title"/></td>
					<td><xsl:value-of select="author"/></td>
				</tr>
			</xsl:for-each>
		</table>
	</xsl:template>
    <xsl:template match="borrows">
		<h4>Lista wypożyczeń:</h4>
		<table>
			<tr>
				<td><b>ID</b></td>
				<td><b>name</b></td>
				<td><b>lastname</b></td>
				<td><b>title</b></td>
                <td><b>author</b></td>
                <td><b>Wypożyczono</b></td>
                <td><b>Koniec wypożyczenia</b></td>
			</tr>
			<xsl:for-each select="borrow">
				<tr>
                    <xsl:variable name="id_reader">
                        <xsl:value-of select="@reader"/>
                    </xsl:variable>
                    <xsl:variable name="id_book">
                        <xsl:value-of select="@book"/>
                    </xsl:variable>

					<td><xsl:value-of select="@id"/></td>
					<td><xsl:value-of select="//readers/reader[@id=$id_reader]/name"/></td>
                    <td><xsl:value-of select="//readers/reader[@id=$id_reader]/lastname"/></td>
                    <td><xsl:value-of select="//books/book[@id=$id_book]/title"/></td>
                    <td><xsl:value-of select="//books/book[@id=$id_book]/author"/></td>
					<td><xsl:value-of select="startdate"/></td>
                    <td><xsl:value-of select="enddate"/></td>
				</tr>
			</xsl:for-each>
		</table>
	</xsl:template>
</xsl:stylesheet>