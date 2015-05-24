#This code will attemt to find the optimal path within a bi-partite graph
#This is the CDT individual assignment

#Methods
# -  Local planning
#1. Get matrix of QoS parameters of each stage
#2. Normalize each parameter
#3. Get associate matrix (W) indicating importance of each parameter
#4. Get utility of each node
#5. Map out optimal path based on utility of each node

# - Global planning (We look at utility of a whole path instead of a node)
#1. Get aggregate matrix for each path on the network
#2. Might not be scalable to check each path. Do linear programming
#3. Get utility of each path and compare
#4. Choose optimal path not best

# We might also need to set minimum parameters of values at each point e.g min security is 3 for us to use a node

# Sample Matrix
#Below are the QoS parameters being considered for each node
# Qv = [delay/responsetime(in seconds), reliability(as percentage), security/trust(1-5), availablity(percentage),capacity(packets)]
#N11 = [1000,0.9,4,0.86,20]

N11 = [1000,0.9,4,0.9,20]
N12 = [700,0.7,5,0.86,70]
N13 = [800,0.85,3,0.7,90]

N21 = [850,0.92,2,0.8,60]
N22 = [900,0.72,4,0.85,30]
N23 = [400,0.86,5,0.9,90]

N31 = [1000,0.76,3,0.73,10]
N32 = [840,0.96,4,0.88,80]
N33 = [450,0.8,4,0.9,40]

N = [ [1000.0,0.9,4,0.9,20],[700,0.7,5,0.86,70],[800,0.85,3,0.7,90],[850,0.92,2,0.8,60],[900,0.72,4,0.85,30],[400,0.86,5,0.9,90],[1000,0.76,3,0.73,10],[840,0.96,4,0.88,80], [450,0.8,4,0.9,40],]

def normalize(N):
    #Transpose to get values of one parameters
    #get all node parameters for each of the five params
    #Find max and min
    #Formula for normalization = (Qmax - Qi / Qmax-Qmin)
    #Make each value a float for accurate values. Integer becomes either just 1 or 0

    normalized_n = []
   
    n = zip(*N) #Transpose the matrix

    for i in n:  #For each parameter, normalize
        i = list(i)
        i_min = float(min(i))
        i_max = float(max(i))
        i_denom = i_max - i_min #This makes the assumption that all values are floats. Need to check for that
        normalized_i = []

        for item in i: #Nested loop. Bad idea. Need to optimize this in future
            norm_item = (i_max - float(item))/i_denom #Again, makes assumption item is float
            normalized_i.append(norm_item)
            
        normalized_n.append(normalized_i)
        
    #Return matrix to normal state
    N = zip(*normalized_n)
    return N

            
            
