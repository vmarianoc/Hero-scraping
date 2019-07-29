import pandas as pd
from scipy.spatial import distance
import sys, json

heros_superpowers = pd.read_csv('dataset.csv')
heros_names = heros_superpowers.loc[:, 'hero_names']
heros_superpowers = heros_superpowers.iloc[:, 11:]
heros_superpowers = pd.concat([heros_superpowers, heros_names], axis=1)


def hero_sokalmichener_distance(heros_superpowers, hero_name = 'A-Bomb', features = ['Agility', 'Accelerated Healing', 'Lantern Power Ring']):
    result = []
    # Get the hero to be compared;
    main_hero = heros_superpowers.loc[heros_superpowers['hero_names'] == hero_name][features]
    
    # Compare using only the given features;
    heros_indexed_by_features = heros_superpowers[features]
    # For each line in the dataset, with the columns indexed by features, calculate the score and create a new column called 'Score'
    for index, row in heros_indexed_by_features.iterrows():
        result.append(distance.sokalmichener(main_hero, row))
    
    heros_indexed_by_features.insert(0, "Score", result, True) 
    return heros_indexed_by_features


hero_sokalmichener_distance(heros_superpowers, sys.argv[1], sys.argv[2].split(',')).sort_values(by=['Score']).head(15).to_json('result.json')

sys.stdout.write("0")
sys.stdout.flush()
sys.exit(0)