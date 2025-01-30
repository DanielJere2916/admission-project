"use client"

import { useState } from "react"
import { motion, AnimatePresence } from "framer-motion"
import { ChevronDown } from "lucide-react"

const faqs = [
  {
    question: "What are the admission requirements?",
    answer:
      "Admission requirements vary by program. Generally, you'll need a high school diploma or equivalent, satisfactory grades in required subjects, and sometimes standardized test scores. Check our Programmes page for specific requirements.",
  },
  {
    question: "How do I apply for financial aid?",
    answer:
      "To apply for financial aid, you need to complete the Free Application for Federal Student Aid (FAFSA) and our university's financial aid application. Visit our Financial Aid office or website for more detailed information and deadlines.",
  },
  {
    question: "What housing options are available for students?",
    answer:
      "We offer various on-campus housing options including traditional dormitories, suite-style residences, and apartment-style housing. Off-campus housing assistance is also available through our Housing Office.",
  },
  {
    question: "Can international students apply?",
    answer:
      "Yes, we welcome international students! In addition to regular admission requirements, international students may need to provide proof of English proficiency (e.g., TOEFL or IELTS scores) and meet visa requirements.",
  },
  {
    question: "What career services do you offer?",
    answer:
      "Our Career Center provides a range of services including career counseling, resume workshops, job fairs, internship placements, and alumni networking events to help students prepare for their future careers.",
  },
]

const FAQItem = ({ question, answer }: { question: string; answer: string }) => {
  const [isOpen, setIsOpen] = useState(false)

  return (
    <motion.div
      className="border-b border-gray-200 last:border-b-0"
      initial={false}
      animate={{ backgroundColor: isOpen ? "rgba(59, 130, 246, 0.05)" : "transparent" }}
      transition={{ duration: 0.3 }}
    >
      <button
        className="flex justify-between items-center w-full text-left py-5 px-4"
        onClick={() => setIsOpen(!isOpen)}
      >
        <span className="text-xl font-semibold text-gray-900">{question}</span>
        <ChevronDown
          className={`w-6 h-6 text-blue-500 transform transition-transform duration-300 ${isOpen ? "rotate-180" : ""}`}
        />
      </button>
      <AnimatePresence initial={false}>
        {isOpen && (
          <motion.div
            initial="collapsed"
            animate="open"
            exit="collapsed"
            variants={{
              open: { opacity: 1, height: "auto" },
              collapsed: { opacity: 0, height: 0 },
            }}
            transition={{ duration: 0.3, ease: [0.04, 0.62, 0.23, 0.98] }}
          >
            <div className="pb-5 px-4 text-gray-600">{answer}</div>
          </motion.div>
        )}
      </AnimatePresence>
    </motion.div>
  )
}

const FAQSection = () => {
  return (
    <section className="py-24 bg-gradient-to-b from-gray-50 to-white">
      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 className="text-4xl font-bold text-center mb-12 text-gray-900">Frequently Asked Questions</h2>
        <motion.div
          className="bg-white rounded-2xl shadow-xl overflow-hidden divide-y divide-gray-200"
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5 }}
        >
          {faqs.map((faq, index) => (
            <FAQItem key={index} question={faq.question} answer={faq.answer} />
          ))}
        </motion.div>
      </div>
    </section>
  )
}

export default FAQSection

