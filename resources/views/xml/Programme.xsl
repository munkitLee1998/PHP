    <?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Accommodation Report</title>
            </head>
            <body>
                <div>
                    <h1>Programme Report</h1>
                    <div>
                        <h2>Programme List</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>Programme Code</th>
                                    <th>Programme Name</th>
                                    <th>Programme Description</th>
                                    <th>Duration(Year of Study)</th>
                                    <th>Level of Study</th>
                                    <th>Faculty</th>
                                    <th>Branch Offered</th>
                                </tr>
                                <xsl:for-each select="programs/program">
                                <xsl:sort select="programCode" order="ascending"/>
                                    <tr>
                                        <td><xsl:value-of select="programCode"/></td>
                                        <td><xsl:value-of select="programName"/></td>
                                        <td><xsl:value-of select="programDesc"/></td>
                                        <td><xsl:value-of select="programDuration"/></td>
                                        <td><xsl:value-of select="programLevel"/></td>
                                        <td><xsl:value-of select="facultyCode"/></td>
                                        <td><xsl:value-of select="branchName"/></td>
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                <div>
                        <h2>Programme Type</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>Programme Code</th>
                                    <th>Programme Name</th>
                                    <th>Programme Description</th>
                                    <th>Duration(Year of Study)</th>
                                    <th>Level of Study</th>
                                    <th>Faculty</th>
                                    <th>Branch Offered</th>
                                </tr>
                                <xsl:for-each select="programs/program">
                                <xsl:sort select="programCode" order="ascending"/>
                                    <tr>
                                        <xsl:choose>
                                            <xsl:when test="@programDuration='4'">
                                                <td bgcolor="#ff00ff"><xsl:value-of select="programCode"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="programName"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="programDesc"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="programDuration"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="programLevel"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="facultyCode"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="branchName"/></td>
                                            </xsl:when>
                                            <xsl:otherwise>
                                               <td><xsl:value-of select="programCode"/></td>
                                               <td><xsl:value-of select="programName"/></td>
                                               <td><xsl:value-of select="programDesc"/></td>
                                               <td><xsl:value-of select="programDuration"/></td>
                                               <td><xsl:value-of select="programLevel"/></td>
                                               <td><xsl:value-of select="facultyCode"/></td>
                                               <td><xsl:value-of select="branchName"/></td>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                    <div>
                    <h2>Total Programme List</h2>
                    <p>
                        Total Programmes: <xsl:value-of select="count(//programme)"/> in the accommodation list.
                    </p>
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
