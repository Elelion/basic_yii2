INSERT INTO categories (title,	parent, alias) VALUES
    ('Комплектующие к Apple', 1, 'lompletuyshie-k-apple'),
    ('Запчасти iPad', 2, 'zapchasti-ipad'),
    ('Запчасти iPhone', 3, 'zapchasti-iPhone'),
    ('Запчасти iPod', 4, 'zapchasti- iPod'),
    ('iPad', 5, 'ipad'),
    ('iPad 2', 6, 'ipad-2'),
    ('iPad NEW (iPad 3)', 7, 'ipad-new-ipad-3');

INSERT INTO products (title, alias, parent, content) VALUES
    ('tLCD ipod Touch', 'lcd-ipod-touch', 1, 'tlcd'),
    ('Len+Touchscreen iPod Touch', 'len-touchscreen-ipod-touch', 2, ''),
    ('Аккумулятор iPod Touch 1G', 'akkumulator-ipod-touch-1g', 3, 'touch 1'),
    ('Аккумулятор iPod Touch 2G', 'akkumulator-ipod-touch-2g', 4, ''),
    ('Len+Touchscreen iPod Touch 2G', 'len-touchscreen-ipod-touch-2g', 5, '');
