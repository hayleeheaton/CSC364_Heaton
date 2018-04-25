<?php
class news
{
    /**
     * Pass in an array of stories to render
     *
     * @param $data
     */
    public static function stories($data)
    {
        foreach ($data as $story) {
            Self::story($story);
        }
    }

    /**
     * Render a single story
     *
     * @param $data
     */
    public static function story($data)
    {
        $name = $data['name'];
        $description = $data['description'];
        $price = $data['price'];
        $sku = $data['sku'];
        $qty_available = $data['qty_available'];
        $pic = $_SERVER['DOCUMENT_ROOT'] . '/images/' . $data['picture'];
        if (is_file($pic)) {
            $picture = '<img src = "/images/' . $data['picture'] . '" width="250">';
        } else {
            $picture = '';
        }

        $id = $data['id'];
        // $author = $data['firstname'] . ' ' . $data['lastname'];
        echo <<<story
        <div class="top10">
            <h2>$name</h2>
            <h5>$price</h5>
            <h5>$qty_available</h5>
            $picture
            <p>$description</p>
            <a href="/UpdatePosts.php?id=' . $id . '" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Update  </a>
            <a href="/DeletePosts.php?id=' . $id . '" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">  Delete</a>
        </div>        
story;
    }

    /**
     * Create the header to a table using the column names as the
     * titles of the column
     * @param $data
     * @return string
     */
    public static function buildTableHeader($data)
    {
        // Start building the table
        $table = '<table class="table table-hover">';
        // Create the table header row
        $header = '<tr>';
        foreach ($data[0] as $key => $cell) {
            $header .= '<th>' . $key . '</th>';
        }
        $header .= '</tr>';
        // Add the header to the table
        $table .= $header;
        return $table;
    }

    /**
     * Close out the table
     * @return string
     */
    public static function closeTable()
    {
        // Close out the table
        $table = '</table>';
        return $table;
    }

    /**
     * Loop through a data row and create the table cells
     * @param $row
     * @return string
     */
    public static function buildTableRow($row)
    {
        // Loop through each cell to build a row of data
        $rowHTML = '<tr>';
        // Loop through each cell and create the cells
        foreach ( $row as $key => $cell ) {
            if($key == 'id') {$id=$cell;}
            $rowHTML .= '<td>' . $cell . '</td>';
        }
        $rowHTML .= '<td><a href="UpdatePosts.php?id='.$id.'">Update </a> |
         <a href="ViewPost.php?id='.$id.'"> View </a> | 
         <a href="DeletePosts.php?id='.$id.'">Delete</a></td>';
        $rowHTML .= '</tr>';
        return $rowHTML;
}
}
