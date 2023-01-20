import mysql from "mysql";
import express from "express";
import { join, dirname } from "path";
import { fileURLToPath } from "url";
import bodyParser from "body-parser";

const getAbsolutePath = (relativePath) => {
  return join(dirname(fileURLToPath(import.meta.url)), relativePath);
};

const app = express();

//если строки или массивы, то может анализировать только входящий объект запроса
app.use(bodyParser.urlencoded({ extended: false }));

// Получает информацию о users.html
app.get("/", (_, response) =>
    response.sendFile(getAbsolutePath("./layout/users.html"))
);
app.get('/ses', function (req, res) {
  res.send('GET request to the homepage');
});
// передаёт информацию
app.post("/save", (request, response) => {
  saveMySuperForm(request.body).then(
      () => response.redirect("/"),
      (err) => response.send(`Unknown err, suck. Try again. : ${err}`)
  );
});

const connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "db",
});

export const saveMySuperForm = async ({ town, data, times, tel, name }) => {
  const query =
      "INSERT INTO reg (`town`, `data`, `times`, `tel`, `name`) VALUES (?, ?, ?, ?, ?)";

  return new Promise((resolve, reject) => {
    connection.query(query, [town, data, times, tel, name], (err, result) => {
      if (err) return reject(err);
      resolve(result);
    });
  });
};