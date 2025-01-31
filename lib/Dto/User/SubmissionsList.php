<?php

/*
 * This file is part of "Discogs-Api-Client".
 *
 * (c) Tim Korn <tim.korn@corncode.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace CornCodeCreators\Discogs\Dto\User;

use CornCodeCreators\Discogs\Dto\Database\Pagination;

class SubmissionsList
{
    private Pagination $pagination;

    private Submissions $submissions;

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): SubmissionsList
    {
        $this->pagination = $pagination;

        return $this;
    }

    public function getSubmissions(): Submissions
    {
        return $this->submissions;
    }

    public function setSubmissions(Submissions $submissions): SubmissionsList
    {
        $this->submissions = $submissions;

        return $this;
    }
}
