<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravindaweerasekara
 * Date: 11/6/14
 * Time: 11:42 AM
 * To change this template use File | Settings | File Templates.
 */
class connection2
{

    public function query($sql)
    {
        mysql_connect('localhost', 'root', '') or die ("connection error" . mysql_error());
        mysql_select_db('page_viewer') or die ("database error" . mysql_error());
        $results = mysql_query($sql);
        return $results;
    }
}
