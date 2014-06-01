<ul id="main-list" class=" chat">
    <?php
    foreach ($listitems as $row => $cols) {

        $itemData = array('targeturl' => $cols['targeturl'],
            'background' => $cols['background'],
            'letter' => $cols['letter'],
            'rowtext1' => $cols['rowtext1'],
            'rowtext2' => $cols['rowtext2'],
            'rowtext3' => $cols['rowtext3'],
            'smlabel' => $cols['smlabel'],
            'smtext' => $cols['smtext']);
        $this->load->view('widgets/listitem', $itemData);
    }
    ?>
</ul>