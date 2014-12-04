<?php

class REvthi {

    private $rArr;

    public function __construct($r1, $r2) {
        $n = range($r1, $r2);
        shuffle($n);
        $this->rArr = $n;
    }

    public function bkdg($a = 1, $min = 0, $max = 10) {
        echo 'hsla('
        . $this->rArr[rand($min, $max)] % 360 . ','
        . $this->rArr[rand($min, $max)] % 100 . '%,'
        . $this->rArr[rand($min, $max)] % 100 . '%,'
        . $a . ')';
    }

    public function sz($min = 10, $max = 100, $uni = 'em') {
        $tmp = $this->rArr[rand(0, 100)];
        echo rand($tmp % $min, $tmp % $max) . $uni;
    }

    public function num($min = 10, $max = 100) {
        $tmp = $this->rArr[rand(0, 100)];
        echo rand($tmp % $min, $tmp % $max);
    }

    public function style($min = 0, $max = 50) {
        $tmp = $this->rArr[rand(0, 100)];
        $bkdg = 'hsla('
                . $this->rArr[rand($min, $max)] % 360 . ','
                . $this->rArr[rand($min, $max)] % 100 . '%,'
                . $this->rArr[rand($min, $max)] % 100 . '%,'
                . 0.9 . ')';
        $pos = [
            'absolute',
            'relative',
            'static'
        ];
        $fl = [
        'none',
        'left',
        'right'
        ];
        $style = 'style="'
                . 'position:' . $pos[rand(0, 3)] . ';'
                . 'float:' . $fl[rand(0, 3)] . ';'
                . 'margin-top:' . rand($tmp % 0, $tmp % 20) . 'em;'
                . 'margin-right:' . rand($tmp % $min, $tmp % $max) . 'em;'
                . 'margin-bottom:' . rand($tmp % $min, $tmp % $max) . 'em;'
                . 'margin-left:' . rand($tmp % $min, $tmp % $max) . 'em;'
                . 'width:' . rand($tmp % $min, $tmp % $max) . 'em;'
                . 'height:' . rand($tmp % $min, $tmp % $max) . 'em;'
                . 'background:' . $bkdg . ';'
                . 'z-index:' . rand($tmp % -1000, $tmp % $max) . ';'
                . '"';
        return $style;
    }

}

class FileSys {

    private $fileDir = './storage/';
    private $secretWord = '#&!%';

    public function linkGen() {
        $links = [];
        foreach (new DirectoryIterator($this->fileDir) as $file) {
            if ($file->getFilename() != '.' && $file->getFilename() != '..')
                if (substr($file->getFilename(), 0, strlen($this->secretWord)) == $this->secretWord) {
                    $filename = $file->getPathname();
                    $handle = fopen($filename, "r");
                    $contents = fread($handle, filesize($filename));
                    fclose($handle);
                    array_push($links, $contents);
                } else {
                    array_push($links, $file->getPathname());
                }
        }
        return $links;
    }

    public function fNum() {
        if ($handle = opendir($this->fileDir)) {
            $cnt = -2;
            while (false !== ($entry = readdir($handle))) {
                $cnt++;
            }
            closedir($handle);
            return $cnt;
        }
    }

}
