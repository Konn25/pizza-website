<?php

namespace App\Exceptions;

use App\FailType;
use Exception as E;
use Illuminate\Http\Request;

abstract class Exception extends E
{
    protected FailType $failType;
    protected array $data = [];
    public function __construct(FailType $failType, array $data = []) {
        $this->failType = $failType;
        $this->data = $data;
    }
    /**
     * Report the exception.
     */
    public function report(): void
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request)
    {
        //
        return response(['fail_type' => $this->failType, 'data' => $this->data]);
    }
}
