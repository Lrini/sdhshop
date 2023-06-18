const express = require('express')
const mysql = require('mysql')
const app = express()

app.set ("view engine","ejs")

//database root
const db = mysql.createConnection({
  host: "localhost",
  database: "sdhshop",
  user:"root",
  password:"",
})
//cek database
db.connect((err)=>{
  if(err) throw err
  console.log("database connected...."); 
  app.get("/",(req,res)=>{
    res.render('index')
  })
})


app.listen(8000, ()=>{
  console.log("server ready")
})