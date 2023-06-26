CREATE DATABASE yeticave;
USE yeticave;

CREATE  TABLE categories(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_category VARCHAR(128),
    character_code VARCHAR(128) UNIQUE  /*cимвольный код example: Одежда (clothing) */
);

CREATE  TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_registration DATETIME DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE ,
    user_name VARCHAR(128) NOT NULL ,
    user_password CHAR(15) NOT NULL ,
    contact TEXT
    );

CREATE  TABLE lots(
     id INT AUTO_INCREMENT PRIMARY KEY,
     date_creation DATETIME, /*время, когда этот лот был создан пользователем */
     lot_tittle VARCHAR(128), /*название лота */
     lot_description TEXT, /*описание лота */
     img VARCHAR(255),
     start_price INT NOT NULL, /*начальная цена*/
     date_finish DATETIME, /*время завершения */
     step INT NOT NULL, /*Шаг ставки — это минимальная разница между текущей ставкой и предыдущей ставкой на аукционе. */
     user_id INT,
     winner_id INT,
     category_id INT,
     FOREIGN KEY (user_id) REFERENCES users(id),
     FOREIGN KEY (winner_id) REFERENCES users(id),
     FOREIGN KEY (category_id) REFERENCES categories(id)
     /*Связи:
    автор: пользователь, создавший лот;
    победитель: пользователь, выигравший лот;
    категория: категория объявления. */
);

CREATE  TABLE bets(
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_baet DATETIME DEFAULT CURRENT_TIMESTAMP, /*время размещения ставки*/
    price_bet INT NOT NULL , /*цена ставки, по которой пользователь готов приобрести лот */
    user_id INT,
    lot_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (lot_id) REFERENCES lots(id)
    /* Связи:
    пользователь;
    лот. */
);