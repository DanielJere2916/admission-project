"use client"

import { useState } from "react"
import { motion } from "framer-motion"

const programmes = [
  {
    name: "Law",
    duration: "4 years",
    requirements: "Minimum MSCE credits: 6",
    description: "Develop critical thinking and analytical skills in our renowned Law program.",
  },
  {
    name: "Computer Science",
    duration: "4 years",
    requirements: "Minimum MSCE credits: 6 including Mathematics",
    description: "Learn cutting-edge technologies and become a leader in the digital world.",
  },
  {
    name: "Public Health",
    duration: "3 years",
    requirements: "Minimum MSCE credits: 6 including Biology",
    description: "Make a difference in communities through our comprehensive Public Health program.",
  },
  {
    name: "Business Administration",
    duration: "4 years",
    requirements: "Minimum MSCE credits: 6",
    description: "Gain the skills to lead organizations and drive business success.",
  },
]

const FeaturedProgrammes = () => {
  const [hoveredIndex, setHoveredIndex] = useState<number | null>(null)

  return (
    <section className="py-16 bg-gray-100">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl font-bold text-center mb-8">Featured Programmes</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {programmes.map((programme, index) => (
            <motion.div
              key={index}
              className="bg-white rounded-lg shadow-md overflow-hidden"
              whileHover={{ scale: 1.05 }}
              onHoverStart={() => setHoveredIndex(index)}
              onHoverEnd={() => setHoveredIndex(null)}
            >
              <div className="p-6">
                <h3 className="text-xl font-semibold mb-2">{programme.name}</h3>
                <p className="text-gray-600 mb-2">Duration: {programme.duration}</p>
                <p className="text-gray-600 mb-4">Requirements: {programme.requirements}</p>
                {hoveredIndex === index && (
                  <motion.p initial={{ opacity: 0 }} animate={{ opacity: 1 }} className="text-sm text-gray-500">
                    {programme.description}
                  </motion.p>
                )}
                <button className="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-300">
                  Learn More
                </button>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  )
}

export default FeaturedProgrammes

