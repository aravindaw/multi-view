<?php
/**
 * Created by IntelliJ IDEA.
 * User: aravindaweerasekara
 * Date: 11/6/14
 * Time: 11:42 AM
 * To change this template use File | Settings | File Templates.
 */
class connection
{

    public function query($sql)
    {
        mysql_connect('aravindaw.com.mysql', 'aravindaw_com', 'stEssW9L') or die ("connection error" . mysql_error());
        mysql_select_db('aravindaw_com') or die ("database error" . mysql_error());
        $results = mysql_query($sql);
        return $results;
    }

  public function query2($sql)
  {
    mysql_connect('aravindaw.com.mysql', 'aravindaw_com', 'stEssW9L') or die ("connection error" . mysql_error());
    mysql_select_db('aravindaw_com') or die ("database error" . mysql_error());
    $results = mysql_query($sql);
    return $results;
  }
}
