INSERT INTO categories (title,	parent, alias) VALUES
    ('Комплектующие к Apple', 0, 'lompletuyshie-k-apple'),
    ('Запчасти iPad', 685, 'zapchasti-ipad'),
    ('Запчасти iPhone', 685, 'zapchasti-iPhone'),
    ('Запчасти iPod', 685, 'zapchasti- iPod'),
    ('iPad', 691, 'ipad'),
    ('iPad 2', 691, 'ipad-2'),
    ('iPad NEW (iPad 3)', 691, 'ipad-new-ipad-3');

INSERT INTO categories (title, alias, parent, content) VALUES
    ('tLCD ipod Touch', 'lcd-ipod-touch', 693, 'tlcd'),
    ('Len+Touchscreen iPod Touch', 'len-touchscreen-ipod-touch', 693, ''),
    ('Аккумулятор iPod Touch 1G', 'akkumulator-ipod-touch-1g', 693, 'touch 1'),
    ('Аккумулятор iPod Touch 2G', 'akkumulator-ipod-touch-2g', 693, ''),
    ('Len+Touchscreen iPod Touch 2G', 'len-touchscreen-ipod-touch-2g', 693, '');
