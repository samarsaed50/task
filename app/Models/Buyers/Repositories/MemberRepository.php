<?php

namespace App\Models\Members\Repositories;

use App\Models\Members\Member;
use App\Models\Qualifications\Repositories\QualificationRepository;
use App\Repositories\BaseRepository;

class MemberRepository extends BaseRepository
{

	public function model()
    {
        return Member::class;
    }

    public function createData()
    {
        return [
//            'language' => app(LanguageRepository::class)->all(),
        ];
    }

    public function editData($id)
    {
        $data = parent::editData($id); // TODO: Change the autogenerated stub


//        $data['language'] = app(LanguageRepository::class)->all();


        return $data;
    }

}
