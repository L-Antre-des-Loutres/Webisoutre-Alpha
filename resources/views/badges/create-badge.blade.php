@extends('layouts.classement')

@section('title', 'Créer un badge')

@section('content')


    <h1>Créer un badge</h1>

    <form action="{{ route('badge.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Titre:</label>
        <input type="text" name="title" id="title">
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <label for="condition">Condition:</label>
        <input type="text" name="condition" id="condition">
        <label for="image_link">Image:</label>
        <input type="file" name="image_link" id="image_link">
        <button type="submit">Créer un badge</button>
    </form>

    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-top: 10px;
        }

        input, textarea {
            margin-top: 5px;
            padding: 5px;
            width: 300px;
        }

        button {
            margin-top: 10px;
            padding: 5px;
            width: 100px;
            background-color: #007bff;
            color: white;
            border: none;
        }

        a {
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        td a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        td form {
            display: inline;
        }

        td form button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        td form button:hover {
            background-color: #c82333;
        }

        td a:hover {
            text-decoration: underline;
        }

        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        td a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        td form {
            display: inline;
        }

        td form button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        td form button:hover {
            background-color: #c82333;
        }

        td a:hover {
            text-decoration: underline;
        }

        td a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

    </style>


@endsection
