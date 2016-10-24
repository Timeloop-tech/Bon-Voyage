<?php
        $config = [
                            'add_article_rules'=>[
                                                [
                                                    'field'=>'title',
                                                    'label'=>'Article Title',
                                                    'rules'=>'required',
                                                ],
                                                [
                                                    'field'=>'body',
                                                    'label'=>'Article Body',
                                                    'rules'=>'required',
                                                ],
                            ],

                            'user_login_rules'=>[
                                                    [
                                                        'field'=>'fname',
                                                        'label'=>'First Name',
                                                        'rules'=>'required',
                                                    ],
                                                    [
                                                        'field'=>'lname',
                                                        'label'=>'Last Name',
                                                        'rules'=>'required',
                                                    ],
                                                    [
                                                        'field'=>'uname',
                                                        'label'=>'User Name',
                                                        'rules'=>'required|alpha_dash|trim',
                                                    ],
                                                    [
                                                        'field'=>'pword',
                                                        'label'=>'Password',
                                                        'rules'=>'required|alpha_dash',
                                                    ],
                                                    [
                                                        'field'=>'title',
                                                        'label'=>'User Title',
                                                        'rules'=>'required',
                                                    ],
                            ],
                            'profile_edit_rules'=>[
                                                [
                                                    'field'=>'fname',
                                                    'label'=>'First Name',
                                                    'rules'=>'required',
                                                ],
                                                [
                                                    'field'=>'lname',
                                                    'label'=>'Last Name',
                                                    'rules'=>'required',
                                                ],
                                                [
                                                    'field'=>'title',
                                                    'label'=>'User Title',
                                                    'rules'=>'required',
                                                ],
                            ],
                            'change_pwd_rules'=>[
                                                    [
                                                        'field'=>'old_pwd',
                                                        'label'=>'Old Password',
                                                        'rules'=>'required',
                                                    ],
                                                    [
                                                        'field'=>'new_pwd',
                                                        'label'=>'New Password',
                                                        'rules'=>'required',
                                                    ],
                                                    [
                                                        'field'=>'re_pwd',
                                                        'label'=>'Re-entered New Password',
                                                        'rules'=>'required|matches[new_pwd]',
                                                    ],
                            ],
        ];