<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Course Report</title>
            </head>
            <body>
                <div>
                    <h1>Course Report</h1>
                    <div>
                        <h2>Course List</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>Course Name</th>
                                    <th>Course Description</th>
                                    <th>Credit Hour</th>
                                </tr>
                                <xsl:for-each select="courses/course">
                                <xsl:sort select="courseName" order="ascending"/>
                                    <tr>
                                        <td><xsl:value-of select="courseName"/></td>
                                        <td><xsl:value-of select="courseDesc"/></td>
                                        <td><xsl:value-of select="creditHour"/></td>
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                    <div>
                    <h2>Total Course</h2>
                    <p>
                        Total Course: <xsl:value-of select="count(//course)"/> in the course list.
                    </p>
                    </div>
                
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
