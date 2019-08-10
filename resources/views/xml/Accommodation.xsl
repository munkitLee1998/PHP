<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : Accommodation.xsl
    Created on : August 6, 2019, 8:04 PM
    Author     : User
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
                <title>Accommodation Report</title>
            </head>
            <body>
                <div>
                    <h1>Accommodation Report</h1>
                    <div>
                        <h2>Accommodation List</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>Accommodation Name</th>
                                    <th>Accommodation Type</th>
                                    <th>Accommodation Room Type</th>
                                    <th>Accommodation Address</th>
                                    <th>Accommodation Fees(per month)</th>
                                </tr>
                                <xsl:for-each select="accommodations/accommodation">
                                <xsl:sort select="accName" order="ascending"/>
                                    <tr>
                                        <td><xsl:value-of select="accName"/></td>
                                        <td><xsl:value-of select="accType"/></td>
                                        <td><xsl:value-of select="accRoomType"/></td>
                                        <td><xsl:value-of select="Address"/></td>
                                        <td><xsl:value-of select="Fees"/></td>
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                <div>
                        <h2>Accommodation Type</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>Accommodation Name</th>
                                    <th>Accommodation Type</th>
                                    <th>Accommodation Room Type</th>
                                    <th>Accommodation Address</th>
                                    <th>Accommodation Fees(per month)</th>
                                </tr>
                                <xsl:for-each select="accommodations/accommodation">
                                <xsl:sort select="accName" order="ascending"/>
                                    <tr>
                                        <xsl:choose>
                                            <xsl:when test="@accType='Double Story'">
                                                <td bgcolor="#ff00ff"><xsl:value-of select="accName"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="accType"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="accRoomType"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="Address"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="Fees"/></td>
                                            </xsl:when>
                                            <xsl:otherwise>
                                                <td><xsl:value-of select="accName"/></td>
                                                <td><xsl:value-of select="accType"/></td>
                                                <td><xsl:value-of select="accRoomType"/></td>
                                                <td><xsl:value-of select="Address"/></td>
                                                <td><xsl:value-of select="Fees"/></td>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                        
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                    <div>
                        <h2>Accommodation Room Type</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>Accommodation Name</th>
                                    <th>Accommodation Type</th>
                                    <th>Accommodation Room Type</th>
                                    <th>Accommodation Address</th>
                                    <th>Accommodation Fees(per month)</th>
                                </tr>
                                <xsl:for-each select="accommodations/accommodation">
                                <xsl:sort select="accName" order="ascending"/>
                                    <tr>
                                        <xsl:choose>
                                            <xsl:when test="@accRoomType='Master Room'">
                                                <td bgcolor="#ff00ff"><xsl:value-of select="accName"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="accType"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="accRoomType"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="Address"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="Fees"/></td>
                                            </xsl:when>
                                            <xsl:otherwise>
                                                <td><xsl:value-of select="accName"/></td>
                                                <td><xsl:value-of select="accType"/></td>
                                                <td><xsl:value-of select="accRoomType"/></td>
                                                <td><xsl:value-of select="Address"/></td>
                                                <td><xsl:value-of select="Fees"/></td>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                        
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                    <div>
                    <h2>Total TARC Accommodation</h2>
                    <p>
                        Total Accommodation: <xsl:value-of select="count(//accommodation)"/> in the accommodation list.
                    </p>
                    </div>
                
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
