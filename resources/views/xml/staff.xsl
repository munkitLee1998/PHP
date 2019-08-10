<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : staff.xsl
    Created on : August 9, 2019, 12:20 PM
    Author     : ASUS
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Staff Report</title>
            </head>
            <body>
                <div>
                    <h1>Staff Report</h1>
                    <div>
                        <h2>See List</h2>
                        <table border="1">
                            <tr bgcolor="#9acd32">
                                <th>ID</th>
                                <th>Staff Name</th>
                                <th>Staff Type</th>
                                <th>Staff Email</th>
                                <th>Password</th>
                            </tr>
                            <xsl:for-each select="user/users">
                                <xsl:sort select="staffName" order="ascending"/>
                                <tr>
                                    <td>
                                        <xsl:value-of select="id"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="staffName"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="stafType"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="email"/>
                                    </td>
                                    <td>
                                        <xsl:value-of select="password"/>
                                    </td>
                                </tr>
                            </xsl:for-each>
                        </table>
                    </div>
                      <div>
                        <h2>Staff Type</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>ID</th>
                                <th>Staff Name</th>
                                <th>Staff Type</th>
                                <th>Staff Email</th>
                                <th>Password</th>
                                </tr>
                                <xsl:for-each select="user/users">
                                <xsl:sort select="feeName" order="ascending"/>
                                    <tr>
                                        <xsl:choose>
                                            <xsl:when test="@staffType='Long'">
                                                <td bgcolor="#ff00ff"><xsl:value-of select="id"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="staffName"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="staffType"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="email"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="password"/></td>
                                            </xsl:when>
                                            <xsl:otherwise>
                                                <td><xsl:value-of select="id"/></td>
                                                <td><xsl:value-of select="staffName"/></td>
                                                <td><xsl:value-of select="staffType"/></td>
                                                <td><xsl:value-of select="email"/></td>
                                                <td><xsl:value-of select="password"/></td>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                        
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                    <div>
                        <h2>Total Staff Record</h2>
                        <p>
                            Total Staff record: <xsl:value-of select="count(/users)"/> in the staff list.
                        </p>
                    </div>
                
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
