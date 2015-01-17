<?php

class Art {

    public function getAll()
    {
        return DB::table('art')->get();
    }

    public function getPiece($name)
    {
        return DB::table('art')->where('name', $name)->first();
    }

    public function getTraditional()
    {
        return DB::table('art')
            ->join('art_tag', 'art.id', '=', 'art_tag.art_id')
            ->where('art_tag.tag_id', '1')
            ->select('*')
            ->get();
    }

    public function getDigital()
    {
        return DB::table('art')
            ->join('art_tag', 'art.id', '=', 'art_tag.art_id')
            ->where('art_tag.tag_id', '2')
            ->select('*')
            ->get();
    }

    public function saveArt($name, $image, $tag)
    {
        $id = DB::table('art')
            ->insertGetId(
                array(
                    'name' => $name,
                    'image' => $image
                ));

        DB::table('art_tag')
            ->insert(
                array(
                    'art_id' => $id,
                    'tag_id' => $tag
                )
            );
    }
}