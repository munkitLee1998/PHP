<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : Fee.xsl
    Created on : August 7, 2019, 1:01 AM
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
                <title>Fee Report</title>
            </head>
            <body>
                <div>
                    <h1>Fee Report</h1>
                    <div>
                        <h2>Fee List</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>Fee Name</th>
                                    <th>Fee Description</th>
                                    <th>Fee Type</th>
                                    <th>Fee Amount(per semester)</th>
                                    <th>Programme Code</th>
                                </tr>
                                <xsl:for-each select="fees/fee">
                                <xsl:sort select="feeName" order="ascending"/>
                                    <tr>
                                        <td><xsl:value-of select="feeName"/></td>
                                        <td><xsl:value-of select="feeDesc"/></td>
                                        <td><xsl:value-of select="feeType"/></td>
                                        <td><xsl:value-of select="feeAmount"/></td>
                                        <td><xsl:value-of select="programCode"/></td>
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                <div>
                        <h2>Fee Type</h2>
                        <table border="1">
                                <tr bgcolor="#9acd32">
                                    <th>Fee Name</th>
                                    <th>Fee Description</th>
                                    <th>Fee Type</th>
                                    <th>Fee Amount(per semester)</th>
                                    <th>Programme Code</th>
                                </tr>
                                <xsl:for-each select="accommodations/accommodation">
                                <xsl:sort select="feeName" order="ascending"/>
                                    <tr>
                                        <xsl:choose>
                                            <xsl:when test="@feeType='Long'">
                                                <td bgcolor="#ff00ff"><xsl:value-of select="feeName"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="feeDesc"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="feeType"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="feeAmount"/></td>
                                                <td bgcolor="#ff00ff"><xsl:value-of select="programCode"/></td>
                                            </xsl:when>
                                            <xsl:otherwise>
                                                <td><xsl:value-of select="feeName"/></td>
                                                <td><xsl:value-of select="feeDesc"/></td>
                                                <td><xsl:value-of select="feeType"/></td>
                                                <td><xsl:value-of select="feeAmount"/></td>
                                                <td><xsl:value-of select="programCode"/></td>
                                            </xsl:otherwise>
                                        </xsl:choose>
                                        
                                    </tr>
                                </xsl:for-each>
                        </table>
                    </div>
                    <div>
                    <h2>Total Fee Record</h2>
                    <p>
                        Total Fee record: <xsl:value-of select="count(/fee)"/> in the accommodation list.
                    </p>
                    </div>
                
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
